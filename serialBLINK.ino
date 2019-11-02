
#include <Servo.h>
Servo myServo;

int LEDpin = 13;
int flag;
int pos=90;
void setup() {
  // put your setup code here, to run once:
Serial.begin(9600);
pinMode(LEDpin, OUTPUT);
myServo.attach(9);
myServo.write(pos);
}

void loop() {
  
  if(Serial.available()){
    flag=Serial.read();
  }
  if ((flag%2 == 0) && (flag >0)){
    digitalWrite(LEDpin, HIGH);
    flag=0;
    pos+=10;
    if(pos>110){
      pos=179;
    }
    myServo.write(pos);
    Serial.println(pos);
    
  }
  if(flag%2 == 1){
    digitalWrite(LEDpin, LOW);
    flag=0;
    pos-=10;
     if(pos<0){
      pos=1;
    }
    myServo.write(pos);
     Serial.println(pos);
    
  }

}
