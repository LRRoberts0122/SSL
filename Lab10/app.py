import hashlib
import os

from flask import Flask, request, render_template, send_from_directory
from werkzeug.security import safe_join

UPLOAD_FOLDER = '/public/uploads'

app = Flask(__name__, static_url_path='/static')
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER

# Ctrl + C to stop server
# You should only have to restart the server if it's crashing...

# URL PARAMETERS:
# - @app.rout('/<id>')
# - def index(id)

# LAB 7 - PROJECT REQUIREMENTS:
# - Create a Form View
# - Create a Results View
# - Display Form Results, an Image, and any hashed variables.

@app.route('/')
def index():
	return 'Welcome!'

@app.route('/<name>/<id>')
def welcome(name, id):
	# print 'Terminal logging...'
	# return 'Hello' + joe
	return 'Hello, ' + name + ' #' + id
	
@app.route('/form')
def form():
	name = "Joe"
	
	return render_template('form.html', name = name)

# You must tell your framework to "allow" form methods (GET / POST)
@app.route('/login', methods=['GET', 'POST'])
def login():
	if request.method == 'POST':
		m = hashlib.md5()
		m.update(request.form['tf_password'])
		password = m.hexdigest()
		return request.form['tf_username'] + ' ' + password
	else:
		return request.method

@app.route('/register', methods=['GET', 'POST'])
def register():
	if request.method == 'POST':
		if request.form['tf_name'] != '':
			# Upload Image
			file = request.files['tf_picture']
			path = 'static/uploads/' + file.filename
			
			if path == 'static/uploads/':
				path = 'http://www.localcrimenews.com/wp-content/uploads/2013/07/default-user-icon-profile.png'
			else:
				file.save(path)
			
			# Hash Password
			md5 = hashlib.md5()
			md5.update(request.form['tf_password'])
			password = md5.hexdigest()
			
			# Return Data
			data = {
				'name' : request.form['tf_name'],
				'email' : request.form['tf_email'],
				'password' : password,
				'picture' : path
			}
			
			return render_template('profile.html', data = data)
			
		else:
			error = "You must fill in all the fields!"
			return render_template('form.html', error = error)
		#m = hashlib.md5()
		#m.update(request.form['tf_password'])
		#password = m.hexdigest()
		#return request.form['tf_username'] + ' ' + password
	else:
		return request.method

if __name__ == '__main__':
	app.run(debug=True)