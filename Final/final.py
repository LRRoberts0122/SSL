from flask import Flask					# Flask Framework
from flask import redirect				# URL Redirects
from flask import render_template		# HTML Templating
from flask import request				# Forms / Methods
from flask import session				# Flask Sessions

import hashlib							# MD5 Hash Library
import mysql.connector					# MySQL Connector

app = Flask(__name__, static_folder="static")
app.secret_key = "F5v543v3m64zV712pGH3MRj496wU3MiO"

# Routes
@app.route("/")
def index():
	# GET DATA FROM SERVER
	connection = new_connection()
	cursor = new_cursor(connection)
	
	stmt = "SELECT * FROM pages WHERE file = %s"
	cursor.execute(stmt, ("index.html",))
	page = cursor.fetchone()
	
	stmt = "SELECT * FROM articles WHERE page = %s"
	cursor.execute(stmt, ("index.html",))
	articles = cursor.fetchall()
		
	data = {
		"page" : page,
		"articles" :  articles
	}
	
	return render_template("index.html", data = data)

@app.route("/login", methods=["GET", "POST"])
def login():
	if request.method == "POST":
		if request.form["username"] and request.form["password"]:
			username = request.form["username"]
			password = new_hash(request.form["password"])
			
			connection = new_connection()
			cursor = new_cursor(connection)
			stmt = "SELECT * FROM users WHERE username = %s AND password = %s"
			cursor.execute(stmt, (username, password))
			result = cursor.fetchone()
			
			if result:
				session['authorized'] = True
				session['current_id'] = result[0]
				return redirect("/dashboard")
			else:
				return redirect("/")
		else:
			return redirect("/")
	else:
		return redirect("/")

@app.route("/dashboard")
def dashboard():
	if session:
		if session["authorized"]:
			# Get Current User
			connection = new_connection()
			cursor = new_cursor(connection)
			stmt = "SELECT * FROM users WHERE id = %s"
			cursor.execute(stmt, (session["current_id"],))
			user = cursor.fetchone()
	
			stmt = "SELECT * FROM pages WHERE file = %s"
			cursor.execute(stmt, ("index.html",))
			page = cursor.fetchone()
			
			data = {
				"user" : user,
				"page" : page
			}
			# Get Page Data
			return render_template("dashboard.html", data = data)
		else:
			return redirect("/")
	else:
		return redirect("/")

@app.route("/save/<id>", methods=["GET", "POST"])
def save(id):
	if session:
		if session["authorized"]:
			if request.method == "POST":
				if request.form["title"] and request.form["subtitle"] and request.files["image"]:
					# SAVE DATA
					title = request.form["title"]
					subtitle = request.form["subtitle"]
					file = request.files["image"]
					path = "static/img/" + file.filename
					file.save(path)
					
					path = "/" + path
					
					# SAVE TO DB
					connection = new_connection()
					cursor = new_cursor(connection)
					
					stmt = "UPDATE pages SET title = %s, subtitle = %s, page_bg = %s WHERE id = %s"
					
					cursor.execute(stmt, (title, subtitle, path, id))
					connection.commit()
					
					return redirect("/")
				else:
					return "ENTER ALL FIELDS!"				
			else:
				return "ERROR"
		else:
			return redirect("/")
	else:
		return redirect("/")

@app.route("/logout")
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

def new_hash(string):
	md5 = hashlib.md5()
	md5.update(string)
	string = md5.hexdigest()
	return string


if __name__ == "__main__":
	app.run(debug = True)