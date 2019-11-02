import roomba
import time

init_serial()
start_data()
set_mode(1)
turn_left()
time.sleep(3)
stop()
end_data()
set_mode(0)
