import roomba
import time

roomba.init_serial()
roomba.turn_right()
time.sleep(1)
roomba.stop()

