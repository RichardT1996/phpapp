#!/bin/bash

# Script to setup Docker and docker-compose on EC2 instances
# Usage: Run this script on each new EC2 instance (webserver2, webserver3)

echo "🚀 Starting EC2 Webserver Setup..."

# Update system
echo "📦 Updating system packages..."
sudo dnf update -y

# Install Docker
echo "🐳 Installing Docker..."
sudo dnf install -y docker
sudo systemctl enable docker
sudo systemctl start docker
sudo usermod -aG docker ec2-user

# Install docker-compose
echo "📦 Installing Docker Compose..."
sudo curl -L "https://github.com/docker/compose/releases/latest/download/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose

# Verify installations
echo "✅ Verifying installations..."
docker --version
docker-compose --version

# Create application directory
echo "📁 Creating application directory..."
sudo mkdir -p /opt/phpapp
sudo chown ec2-user:ec2-user /opt/phpapp

echo "✅ Setup complete!"
echo "📝 Please logout and login again for Docker group changes to take effect"
echo "   Or run: newgrp docker"
