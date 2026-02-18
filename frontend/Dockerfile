# Base image
FROM node:20

# Working directory
WORKDIR /app

# Copy package.json & install deps
COPY package*.json ./
RUN npm install

# Copy source code
COPY . .

# Expose port
EXPOSE 8080

# Start app
CMD ["npm", "run", "serve"]
