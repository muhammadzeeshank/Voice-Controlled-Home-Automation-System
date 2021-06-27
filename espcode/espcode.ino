#include <WiFi.h>
#include <HTTPClient.h>
#include "BluetoothSerial.h"

#if !defined(CONFIG_BT_ENABLED) || !defined(CONFIG_BLUEDROID_ENABLED)
#error Bluetooth is not enabled! Please run `make menuconfig` to and enable it
#endif

#define WIFI_NETWORK "M Home"
#define WIFI_PASSWORD "298Aa537"
#define WIFI_TIMEOUT 20000

#define s1 15
#define s2 18
#define s3 4
#define s4 22

#define ON_BOARD_LED 2
#define dv0 32
#define dv1 33
#define dv2 25
#define dv3 26

int flag1_previous =0, flag2_previous = 0, flag3_previous = 0, flag4_previous= 0;
String host = "zeeshanautohome.000webhostapp.com", url = "/read.php", device;
int httpPort = 80, t = 0;

BluetoothSerial SerialBT;

void connectToWiFi() {
    Serial.println("Connecting to WiFi");
    pinMode(ON_BOARD_LED, OUTPUT);
    WiFi.mode(WIFI_STA);
    unsigned long startTime = millis();
    WiFi.begin(WIFI_NETWORK, WIFI_PASSWORD);
    while (WiFi.status() != WL_CONNECTED && millis() - startTime < WIFI_TIMEOUT) {
        Serial.print("..");
        digitalWrite(ON_BOARD_LED, HIGH);
        delay(250);
        digitalWrite(ON_BOARD_LED, LOW);
        delay(250);
    }
    if (WiFi.status() == WL_CONNECTED) {
        Serial.println("WiFi Connected");
        Serial.println(WiFi.localIP());
    }
}

void setup() {
    Serial.begin(9600);
    digitalWrite(dv0, HIGH);
    digitalWrite(dv1, HIGH);
    digitalWrite(dv2, HIGH);
    digitalWrite(dv3, HIGH);
    pinMode(dv0, OUTPUT);
    pinMode(dv1, OUTPUT);
    pinMode(dv2, OUTPUT);
    pinMode(dv3, OUTPUT);
    pinMode(s1, INPUT);
    pinMode(s2, INPUT);
    pinMode(s3, INPUT);
    pinMode(s4, INPUT);
    SerialBT.begin("ESP32test");
    Serial.println("Bluetooth started!");
    connectToWiFi();
}
void loop() {
    if (WiFi.status() == WL_CONNECTED) {
        device = "";
        device = httpGetRequest();
        Serial.println("Data read: ");
        Serial.println(device);
        printToRelay();
    }
    if (SerialBT.available()) {
        device = "";
        String data = blueDataDecode();
        if (device.indexOf("wifion") > 0) {
            connectToWiFi();
        }
        else if (device.indexOf("wifioff") > 0) {
            WiFi.disconnect();
            Serial.println("wifi disconnected");
        }
        postToURL(printToRelay());
    }
    device = "";
    switches();
    postToURL(printToRelay());
    delay(3000);
}

String httpGetRequest() {
    HTTPClient http;
    String payload = "";
    http.begin(host, httpPort, url);
    int httpResp = http.GET();
    if (httpResp > 0) {
        t = 0;
        payload = http.getString();
    }
    else {
        t++;
        Serial.print("Error code: ");
        Serial.println(httpResp);
    }
    http.end();
    if (t > 10) {
        Serial.println("Wifi disconnected");
        WiFi.disconnect();
    }
    return payload;
}
String printToRelay() {
    String datapost = "";
    // for first device
    if (device.indexOf("d0on") > 0) {
        digitalWrite(dv0, LOW);
        datapost += "&hidden_status=on";
        Serial.println("R1 on");
    }
    else if (device.indexOf("d0off") > 0) {
        digitalWrite(dv0, HIGH);
        datapost += "&hidden_status=off";
        Serial.println("R1 off");
    }
    // for 2nd device
    if (device.indexOf("d1on") > 0) {
        digitalWrite(dv1, LOW);
        datapost +="&hidden_status1=on";
        Serial.println("R2 on");
    }
    else if (device.indexOf("d1off") > 0) {
        digitalWrite(dv1, HIGH);
        datapost +="&hidden_status1=off";
        Serial.println("R2 off");
    }
    // for 3rd device
    if (device.indexOf("d2on") > 0) {
        digitalWrite(dv2, LOW);
        datapost += "&hidden_status2=on";
        Serial.println("R3 on");
    }
    else if (device.indexOf("d2off") > 0) {
        digitalWrite(dv2, HIGH);
        datapost += "&hidden_status2=off";
        Serial.println("R3 off");
    }
    // for 4rth device
    if (device.indexOf("d3on") > 0) {
        digitalWrite(dv3, LOW);
        datapost += "&hidden_status3=on";
        Serial.println("R4 on");
    }
    else if (device.indexOf("d3off") > 0) {
        digitalWrite(dv3, HIGH);
        datapost += "&hidden_status3=off";
        Serial.println("R4 off");
    }
    return datapost;
}
String blueDataDecode() {
    char incomingChar;
    String message = "";
    while (SerialBT.available()) {
        incomingChar = SerialBT.read();
        message += String(incomingChar);
    }
    //Serial.print("Bluetooth dataread: ");
    //Serial.println(message);
    device = "space " + message;
    return device;
}
void postToURL(String relaystatus) {
    if (WiFi.status() == WL_CONNECTED) {
        HTTPClient http;
        String url1 = "/update.php";
        http.begin(host, httpPort, url1);
        http.addHeader("Content-Type", "application/x-www-form-urlencoded");
        int httpResp = http.POST(relaystatus);
        if (httpResp > 0) {
            t = 0;
            Serial.println("posted to server");
        }
        else {
            t++;
            Serial.print("Error code: ");
            Serial.println(httpResp);
            delay(2000);
        }
        http.end();
    }
}
void switches(){
  if(digitalRead(s1) == LOW && flag1_previous == 0){
    device += "space d0on";
    flag1_previous = 1;
  }
   if(digitalRead(s1) == HIGH && flag1_previous == 1){
    device += "space d0off";
    flag1_previous = 0;
  }
    if(digitalRead(s2) == LOW && flag2_previous == 0){
    device += "space d1on";
    flag2_previous = 1;
  }
   if(digitalRead(s2) == HIGH && flag2_previous == 1){
    device += "space d1off";
    flag2_previous = 0;
  }
    if(digitalRead(s3) == LOW && flag3_previous == 0){
    device += "space d2on";
    flag3_previous = 1;
  }
   if(digitalRead(s3) == HIGH && flag3_previous == 1){
    device += "space d2off";
    flag3_previous = 0;
  }
  if(digitalRead(s4) == LOW && flag4_previous == 0){
    device += "space d3on";
    flag4_previous = 1;
  }
   if(digitalRead(s4) == HIGH && flag4_previous == 1){
    device += "space d3off";
    flag4_previous = 0;
  }
}
