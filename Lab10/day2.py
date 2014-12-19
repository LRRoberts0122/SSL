from flask import Flask, request, render_template, redirect, session, url_for
import mysql.connector

app = Flask(__name__)
app.secret_key = '1234' # Normally this would look something like an API key...

@app.route('/')
def index():
	return render_template('day2.html')

@app.route('/login', methods=['GET', 'POST'])
def loginAction():
	if request.method == 'POST':
		cnx = mysql.connector.connect(
			user = "root",
			password = "root",
			host = "127.0.0.1",
			port = "8889",
			database = "SSL"
		)
		
		# The Cursor finds the "root" of your Database for efficient querying
		cur = cnx.cursor()
		
		print(request.form['tf_username'])
		print(request.form['tf_password'])
			
		cur.execute("SELECT * FROM users WHERE username=%s AND password=%s", (request.form['tf_username'], request.form['tf_password']))
		# cnx.commit()
		
		user = cur.fetchone()
		cnx.close()
		
		if user:
			session["valid_user"] = 1
			return redirect("/protected")
		else:
			session["valid_user"] = 0
			session["error"] = "Invalid username or password!"
			return redirect("/")
		
		
	else:
		return request.method
		#check against the db
		#if the user login good
			#show 

@app.route('/')


if __name__ == '__main__':
	app.run(debug=True)