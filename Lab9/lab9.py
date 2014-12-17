# App Configuration
from flask import Flask, redirect, render_template, request, session, url_for
import mysql.connector
import hashlib

app = Flask(__name__, static_folder='static')
app.secret_key = 'F5v543v3m64zV712pGH3MRj496wU3MiO'

# Custom 404
@app.errorhandler(404)
def page_not_found(e):
	return render_template("lab9/404.html"), 404

# Routes
@app.route('/')
def index():
	if session:
		if session['authorized']:
			return redirect("/myaccount")
		else:
			return render_template('lab9/index.html')
	else:
		return render_template('lab9/index.html')

@app.route('/login', methods=['GET', 'POST'])
def login():
	if request.method == 'POST':
		result = login_user(request.form['email'], request.form['password'])
		if result['success']:
			session['authorized'] = True
			session['current_id'] = result['id']
			return redirect("/myaccount")
		else:
			return redirect("/login/error/" + result['error'])
	else:
		return redirect("/login/error/fatal")

@app.route('/signup')
def signup():
	return render_template('lab9/register.html')

@app.route('/register', methods=['GET', 'POST'])
def register():
	if request.method == 'POST':
		if request.form['first_name'] and request.form['last_name'] and request.form['display_name'] and request.form['email'] and request.form['password'] and request.form['password_confirmation']:
			
			if request.form['password'] == request.form['password_confirmation']:
				# Upload Image
				file = request.files['picture']
				path = file.filename
				
				if not file.filename:
					path = 'https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=50'
				else:
					file.save(path)
					path = '/static/uploads/' + file.filename
				
				# Hash Password
				md5 = hashlib.md5()
				md5.update(request.form['password'])
				password = md5.hexdigest()
				
				# Return Data
				data = {
					'firstname' : request.form['first_name'],
					'lastname' : request.form['last_name'],
					'username' : request.form['display_name'],
					'email' : request.form['email'],
					'password' : password,
					'picture' : path
				}
				
				# Connect to Database
				connection = new_connection()
				cursor = new_cursor(connection)
				stmt = "INSERT INTO users (username, firstname, lastname, email, password, avatar) VALUES (%s, %s, %s, %s, %s, %s)"
				cursor.execute(stmt, (request.form['display_name'], request.form['first_name'], request.form['last_name'], request.form['email'], password, path))
				connection.commit()
				
				id = cursor.lastrowid
				
				session['authorized'] = True
				session['current_id'] = id
				
				return redirect("/myaccount")
			else:
				return redirect("/signup/error/1005")
		else:
			return redirect("/signup/error/1004")
	else:
		return redirect("/signup/error/fatal")

@app.route('/delete/<uid>')
def delete(uid):
	if session:
		if session['authorized']:
			
			connection = new_connection()
			cursor = new_cursor(connection)
			stmt = "DELETE FROM users WHERE id = %s"
			id = (uid,)			
			cursor.execute(stmt, (id))
			connection.commit()
			return redirect("/admin/users")
		else:
			return redirect("/login/error/1003")
	else:
		return redirect("/login/error/1003")

@app.route('/myaccount')
def my_account():
	if session:
		if session['authorized']:
			data = get_user_by_id(session['current_id'])
			return render_template("lab9/profile.html", data = data)
		else:
			return redirect("/login/error/1003")
	else:
		return redirect("/login/error/1003")

@app.route('/admin/users')
def users():
	if session:
		if session['authorized']:
			users = get_all_users()
			return render_template('lab9/users.html', data = users)
		else:
			return redirect("/login/error/1003")
	else:
		return redirect("/login/error/1003")

@app.route('/admin/users/update/<uid>', methods=['GET', 'POST'])
def update(uid):
	if session:
		if session['authorized']:			
			connection = new_connection()
			cursor = new_cursor(connection)
			
			if request.form['tf_edit_firstname']:
				stmt = "UPDATE users SET firstname = %s WHERE id = %s"
				cursor.execute(stmt, (request.form['tf_edit_firstname'], uid))
				connection.commit()
			
			if request.form['tf_edit_lastname']:
				stmt = "UPDATE users SET lastname = %s WHERE id = %s"
				cursor.execute(stmt, (request.form['tf_edit_lastname'], uid))
				connection.commit()
				
			if request.form['tf_edit_username']:
				stmt = "UPDATE users SET username = %s WHERE id = %s"
				cursor.execute(stmt, (request.form['tf_edit_username'], uid))
				connection.commit()
			
			if request.form['tf_edit_email']:
				stmt = "UPDATE users SET email = %s WHERE id = %s"
				cursor.execute(stmt, (request.form['tf_edit_email'], uid))
				connection.commit()

			return redirect("/admin/users")
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
		
	return render_template('lab9/index.html', message = message)

@app.route('/signup/error/<code>')
def register_error(code):
	message = ""
	
	if code == '1004':
		message = "You must enter all form fields (except a profile image)!"
	elif code == '1005':
		message = "Your passwords don't match!"
	else:
		message = "Uhoh! Something broke... Please try again!"
	
	return render_template('lab9/register.html', message = message)


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

def get_all_users():
	connection = new_connection()
	cursor = new_cursor(connection)
	cursor.execute("SELECT * FROM users")
	users = cursor.fetchall()
	
	return users
	
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
		'username' : result[1],
		'firstname' : result[2],
		'lastname' : result[3],
		'email' : result[4],
		'password' : result[5],
		'avatar' : result[6]
	}
	
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