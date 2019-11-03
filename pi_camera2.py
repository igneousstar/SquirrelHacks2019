
from io import BytesIO
import time
from picamera import PiCamera

# Create an in-memory stream
def video():
	my_stream = BytesIO()
	camera = PiCamera()
	camera.start_preview()
	camera.rotation = 180
	try:
		while True:
			time.sleep(1)
	finally:
		camera.stop_preview()

video()
