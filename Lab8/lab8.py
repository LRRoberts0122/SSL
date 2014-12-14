# App Configuration
from flask import Flask, redirect, render_template, request, session, url_for
import mysql.connector
import hashlib

app = Flask(__name__)
app.secret_key = 'F5v543v3m64zV712pGH3MRj496wU3MiO'

# Routes
@app.route('/')
def index():
	if session:
		if session['authorized']:
			return redirect("/myaccount/" + str(session['current_id']))
		else:
			return render_template('lab8/index.html')
	else:
		return render_template('lab8/index.html')

@app.route('/login', methods=['GET', 'POST'])
def login():
	if request.method == 'POST':
		result = login_user(request.form['tf_email'], request.form['tf_password'])
		if result['success']:
			session['authorized'] = True
			session['current_id'] = result['id']
			return redirect("/myaccount/" + str(session['current_id']))
		else:
			return redirect("/login/error/" + result['error'])
	else:
		return redirect("/login/error/fatal")

@app.route('/myaccount/<uid>')
def my_account(uid):
	if session:
		if session['authorized']:
			data = get_user_by_id(session['current_id'])
			return render_template("profile.html", data = data)
		else:
			return redirect("/login/error/1003")
	else:
		return redirect("/login/error/1003")
		
# Error Handling...
@app.route('/login/error/<code>')
def index_error(code):
	message = ""
	
	if code == '1001':
		message = "Please enter your email and password!"
	elif code == '1002':
		message = "Email or Password is incorrect!"
	elif code == '1003':
		message = "You must be logged in to do that!"
	else:
		message = "Uhoh! Something broke... Please try again!"
		
	return render_template('lab8/index.html', message = message)

@app.route('/logout')
def logout():
	session.clear()
	return redirect("/")

# Global Functions
def new_connection():
	connection = mysql.connector.connect(
		user = "root",
		password = "root",
		host = "127.0.0.1",
		port = "8889",
		database = "SSL"
	)
	return connection
	
def new_cursor(connection):
	cursor = connection.cursor()
	return cursor
	
def hash_password(password):
	md5 = hashlib.md5()
	md5.update(password)
	password = md5.hexdigest()
	return password
	
def get_user_by_id(id):
	connection = new_connection()
	cursor = new_cursor(connection)
	
	uid = (id,)
	stmt = "SELECT * FROM users WHERE id=%s"
	
	cursor.execute(stmt, (uid))
	
	result = cursor.fetchone()
	connection.close()
	
	user = {
		'id' : result[0],
		'name' : result[1],
		'email' : result[2],
		'password' : result[3]
	}
	
	if not result[4]:
		user['avatar'] = 'http://www.localcrimenews.com/wp-content/uploads/2013/07/default-user-icon-profile.png'
	else:
		user['avatar'] = '/static/uploads/' + result[4]
	
	return user
	
def login_user(email, password):
	data = {}
	
	if email and password:
		connection = new_connection()
		cursor = new_cursor(connection)
		
		stmt = "SELECT * FROM users WHERE email=%s AND password=%s"
		
		hashed_password = hash_password(password)
		cursor.execute(stmt, (email, hashed_password))
		
		result = cursor.fetchone()
		connection.close()
		
		if result:
			data = {
				'success' : True,
				'id' : result[0]
			}
		else:
			data = {
				'success' : False,
				'error' : "1002"
			}		
	else:
		data = {
			'success' : False,
			'error' : "1001"
		}
		
	return data


if __name__ == '__main__':
	app.run(debug=True)