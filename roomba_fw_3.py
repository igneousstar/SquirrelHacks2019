import roomba
import time

roomba.init_serial()
roomba.forward()
time.sleep(3)
roomba.stop()


