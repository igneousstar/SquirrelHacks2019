/**************************************************************************/
/*!
    @file     ROOMBA.iso
    @author   Isaiah Exley-Schuman
    Code that handles sensors mounted on roomba and passes to PI after 
    every request
    v1.0 - First release
*/
/**************************************************************************/

#include <Wire.h>
#include <Adafruit_MPL3115A2.h>
#include <Adafruit_AMG88xx.h>
#include <Adafruit_Sensor.h>
#include <Adafruit_FXAS21002C.h>
#include <Servo.h>
Servo myServo;

int LEDpin = 13;
int flag;
int pos=90;

Adafruit_FXAS21002C gyro = Adafruit_FXAS21002C(0x0021002C);

Adafruit_AMG88xx amg;

float pixels[AMG88xx_PIXEL_ARRAY_SIZE];
Adafruit_MPL3115A2 baro = Adafruit_MPL3115A2();

void setup() {
  Serial.begin(9600);
    bool status;
    
    // default settings
    status = amg.begin();
    if (!status) {
        Serial.println("Could not find a valid AMG88xx sensor, check wiring!");
        while (1);
    }
    

    Serial.println();

    delay(100); // let sensor boot up

    sensor_t sensor;
    gyro.getSensor(&sensor);


  if(!gyro.begin())
  {
    /* There was a problem detecting the FXAS21002C ... check your connections */
    Serial.println("Ooops, no FXAS21002C detected ... Check your wiring!");
    while(1);
  }
pinMode(LEDpin, OUTPUT);
myServo.attach(9);
myServo.write(pos);

Serial.print("print 0 for live output. ");
Serial.print("print 1 for servo down. ");
Serial.print("print 2 for servo up. ");

}

void loop() {
if (Serial.available()){
  int inputser = Serial.read();
  if (inputser==50){
    digitalWrite(LEDpin, LOW);
    pos-=10;
    if(pos<0){
      pos=0;
    }
    myServo.write(pos);
    ///Serial.print(pos);
    
  }
  else if (inputser==49){
    digitalWrite(LEDpin, HIGH);
    pos+=10;
     if(pos>100){
      pos=100;
    }
    myServo.write(pos);
     ///Serial.print(pos);
    
  }

else if (inputser==48){

Serial.print("Sensor output:");

  if (! baro.begin()) {
    Serial.print("Couldnt find sensor");
    return;
  }
  
  float pascals = baro.getPressure();
  // Our weather page presents pressure in Inches (Hg)
  // Use http://www.onlineconversion.com/pressure.htm for other units
  Serial.print(pascals/3377); Serial.print(" Inches (Hg). ");

  float altm = baro.getAltitude();
  Serial.print(altm); Serial.print(" meters. ");

  float tempC = baro.getTemperature();
  Serial.print(tempC); Serial.print("*C. ");

    //read all the pixels
    amg.readPixels(pixels);

    float maxnum = 0;
    float avenum = 0;
    for(int i=1; i<=AMG88xx_PIXEL_ARRAY_SIZE; i++){
      avenum = avenum + pixels[i-1];
      if (pixels[i-1]>maxnum){
        maxnum = pixels[i-1];
      }
    }
    avenum = avenum / AMG88xx_PIXEL_ARRAY_SIZE;
    Serial.print(" MAX IR temp:"); Serial.print(maxnum);
    Serial.print(" AVE IR temp:"); Serial.print(avenum);

    sensors_event_t event;
    gyro.getEvent(&event);

    /* Display the results (speed is measured in rad/s) */
    Serial.print(" X: "); Serial.print(event.gyro.x); Serial.print("  ");
    Serial.print(" Y: "); Serial.print(event.gyro.y); Serial.print("  ");
    Serial.print(" Z: "); Serial.print(event.gyro.z); Serial.print("  ");
    Serial.println("rad/s. ");
}
}
}
