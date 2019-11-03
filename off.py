#!/usr/bin/env python3
import serial
ser = serial .Serial('/dev/ttyACM0', 9600)
ser.write(b'1')
print("nay")

