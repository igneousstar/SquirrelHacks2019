import roomba
import time

roomba.init_serial()
roomba.turn_left()
time.sleep(3)
roomba.stop()

