import sys
import smtplib

def send_otp_email(email, password, to, subject, otp):
    # Set up SMTP connection
    server = smtplib.SMTP('smtp.gmail.com', 587)
    server.starttls()

    # Login to email account
    server.login(email, password)

    # Create message
    message = f'Subject: {subject}\n\nYour OTP is {otp}'

    # Send message
    server.sendmail(email, to, message)

    # Close SMTP connection
    server.quit()

# Get command-line arguments
email = sys.argv[1]
password = sys.argv[2]
to = sys.argv[3]
subject = sys.argv[4]
otp = sys.argv[5]

# Send OTP email
send_otp_email(email, password, to, subject, otp)
