import roomba
import time

roomba.init_serial()
roomba.turn_left()
time.sleep(1)
roomba.stop()

