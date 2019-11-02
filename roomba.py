import serial

def init_serial():
    CONUM = 1
    global ser
    ser = serial.Serial()
    ser.baudrate = 115200
    ser.port = CONUM - 1
    ser.timeout = 10
    ser.open()
    if ser.isOpen():
        print 'Open: ' + ser.portstr

def set_mode():
    while (input_correct = 0):
        mode = rawinput("Choose mode(passive,safe,full)")
        if (mode = "passive"):
            sent = byte(7)
            ser.write(sent)
            input_correct = 1
        else if (mode = "safe"):
            sent = byte(131)
            ser.write(sent)
            input_correct = 1
        else if (mode = "full"):
            sent = byte(132)
            ser.write(sent)
            input_correct = 1
        else:
            print "error, incorrect input"

def start():
    sent = byte(128)
    ser.write(sent)

def stop():
    sent = byte(173)
    ser.write(sent)

def clean():
    sent = byte(135)
    ser.write(sent)

def go_home(): #seek dock
    sent = byte(143)
    ser.write(sent)

def forward():
    sent = bytes([135, 0,127,0,127])
    ser.write(sent)
    
def backward():
    sent = bytes([135, 255,127,255,127])
    ser.write(sent)
    
def turn_left():
    sent = bytes([135, 0,127,255,127])
    ser.write(sent)
    
def turn_right():
    sent = bytes([135, 255,127,0,127])
    ser.write(sent)

def stop():
    sent = bytes([135, 0,0,0,0])
    ser.write(sent)

def vaccum_disable():
    sent = bytes([138, 0])
    ser.write(sent)
