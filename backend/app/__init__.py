# app/__init__.py

from flask import Flask
from flask_cors import CORS

app = Flask(__name__)
CORS(app)

# Import routes to register them with the app
from app import routes
