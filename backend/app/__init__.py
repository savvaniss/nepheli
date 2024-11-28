# app/__init__.py

from flask import Flask

app = Flask(__name__)

# Import routes to register them with the app
from app import routes
