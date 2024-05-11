const express = require('express');
const bodyParser = require('body-parser');
const app = express();

// Middleware to parse JSON bodies
app.use(bodyParser.json());

// Mock database
const users = [
    { username: 'user1', password: 'pass1' },
    { username: 'user2', password: 'pass2' },
    // Add more users as needed
];

// Route for handling login requests
app.post('/login', (req, res) => {
    const { username, password } = req.body;
    const user = users.find(u => u.username === username && u.password === password);
    if (user) {
        res.send('Login successful');
    } else {
        res.status(401).send('Login failed');
    }
});

// Start the server
const port = 3000;
app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
});
