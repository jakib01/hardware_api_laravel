#include<Arduino.h>  //library for using arduino syntax and default functions in C++
#include<ESP8266WiFi.h>  //library for Wi-Fi connection
#include<ESP8266HTTPClient.h>  //library for handling client-side http requests
#include <WiFiClient.h>

const byte wifiLED = D0;
const byte redLED = D4;
const byte greenLED = D8;
const byte wifiConnetct = D2;
const byte error = D1;

// objects
WiFiClient wifi;
HTTPClient http;

const char *password = "Akib108064";  //put you Wi-Fi password here
const char *ssid = "Akib's Personal";  //put your Wi-Fi network's name here

void setup()
{
  Serial.begin(9600);  //initializing serial communication with PC


  // pins initialization
  pinMode(wifiLED, OUTPUT);
  pinMode(redLED, OUTPUT);
  pinMode(greenLED, OUTPUT);
  pinMode(wifiConnetct, OUTPUT);
  pinMode(error, OUTPUT);
  
  digitalWrite(redLED, LOW);
  digitalWrite(greenLED, LOW);
  
  WiFi.begin(ssid, password);  //initializing connection to the Wi-Fi router
  WiFi.hostname("Akibs-NodeMCU");  //declaring hostname for DHCP on the Wi-Fi router
  Serial.println("Starting NodeMCU v1.0 (ESP-12E)..");  //welcome message
  Serial.print("Waiting for Wi-Fi connection");  //Wi-Fi connection initializing message for the serial monitor on PC

  while(WiFi.status() != WL_CONNECTED)  //while the NodeMCU is trying to connect to the router show a dot on the serial monitor every 0.5 second
  {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.print("Connected to Wi-Fi network: ");
  Serial.println(ssid);  //SSID of the router which the NodeMCU is connected to
  Serial.print("Assigned IP address: ");
  Serial.println(WiFi.localIP());  //assigned IP address of the NodeMCU
  Serial.print("Hostname: ");
  Serial.println(WiFi.hostname());  //DHCP hostname of the NodeMCU
  Serial.println("");
}

void loop()
{

  String serverURL = "https://hardware.api.julkernienakib.com/api/state";
    
  if (WiFi.status() == WL_CONNECTED) { //Check WiFi connection status
    
  
    int httpCode;
    String link, state;
    link = serverURL;
    http.begin(wifi,"http://hardware.api.julkernienakib.com/api/state");

    httpCode = http.GET();
    delay(800);
    if (httpCode == 200) {
      state = http.getString();
      digitalWrite(wifiConnetct, HIGH);
      Serial.println(state);

      if (state == "0") {
      digitalWrite(redLED, HIGH);
      digitalWrite(greenLED, LOW);
      digitalWrite(wifiConnetct, HIGH);
      digitalWrite(error, LOW);
      Serial.print("Red");
      return;
      }
      else if (state == "1") {
      digitalWrite(redLED, LOW);
      digitalWrite(greenLED, HIGH);
      digitalWrite(wifiConnetct, HIGH);
      digitalWrite(error, LOW);
      Serial.print("Green");
      return;
      }
      else {
      digitalWrite(redLED, LOW);
      digitalWrite(greenLED, LOW);
      digitalWrite(wifiConnetct, HIGH);
      digitalWrite(error, LOW);
      Serial.print("Nothing ");
      return;
      }
    }
 
    else {
      Serial.println("An error has occured!! Retrying..");
      digitalWrite(error, HIGH);
    }
   
    http.end();   //Close connection
  }
//  delay(5000);
}
