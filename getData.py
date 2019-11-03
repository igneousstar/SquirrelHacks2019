#!/usr/bin/env python3
import serial
import picamera
ser = serial .Serial('/dev/ttyACM0', 9600)
ser.write(b'0')
data= ser.readline()

print(data)
