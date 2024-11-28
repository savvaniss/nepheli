# run.py

from app import app

if __name__ == '__main__':
    # Run on all IP addresses (for networked nodes), and specify the port
    app.run(host='0.0.0.0', port=5000)
