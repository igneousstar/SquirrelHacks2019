import roomba
import time

roomba.init_serial()
roomba.turn_right()
time.sleep(3)
roomba.stop()

