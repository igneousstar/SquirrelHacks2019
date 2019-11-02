import serial
import time

def init_serial():
    CONUM = 1
    global ser
    ser = serial.Serial()
    ser.baudrate = 115200
    ser.port = "COM5"
    ser.timeout = 10
    ser.open()
    if ser.isOpen():
        print ('Open: ' + ser.portstr)

def set_mode(mode):
    if (mode == 0):
        sent = bytes([7])
        ser.write(sent)
        print(sent)
    elif (mode == 1):
        sent = bytes([131])
        ser.write(sent)
        print(sent)
    elif (mode == 3): #full mode
        sent = bytes([132])
        ser.write(sent)
        print(sent)

def start_data():
    sent = bytes([128])
    ser.write(sent)
    print(sent)

def stop_data():
    sent = bytes([173])
    ser.write(sent)
    print(sent)

def clean():
    sent = bytes([135])
    ser.write(sent)
    print(sent)

def go_home(): #seek dock
    sent = bytes([143])
    ser.write(sent)
    print(sent)

def forward():
    sent = bytes([145, 0,127,0,127])
    ser.write(sent)
    print(sent)
    
def backward():
    sent = bytes([145, 255,127,255,127])
    ser.write(sent)
    print(sent)
    
def turn_left():
    sent = bytes([145, 0,127,255,127])
    ser.write(sent)
    print(sent)
    
def turn_right():
    sent = bytes([145, 255,127,0,127])
    ser.write(sent)
    print(sent)

def stop():
    sent = bytes([145, 0,0,0,0])
    ser.write(sent)
    print(sent)

def vaccum_disable():
    sent = bytes([138, 0])
    ser.write(sent)
    print(sent)

def 

init_serial()
start_data()
time.sleep(1)
set_mode(3)
time.sleep(1)
clean()
time.sleep(10)
set_mode(0)
stop_data()

