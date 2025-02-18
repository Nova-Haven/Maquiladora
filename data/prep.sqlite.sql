-- SQLite schema for initial setup

-- Drop existing tables if they exist
DROP TABLE IF EXISTS "login";

-- Create login table with hashed password field
CREATE TABLE IF NOT EXISTS "login" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT,
    "pwd" TEXT NOT NULL
);

-- Insert initial admin login with pre-hashed password
-- Default password is 'admin123'
INSERT INTO login (pwd) VALUES ('$2y$12$3M7i1OYfLmzrEox3Vinp3.VZzBXO9xWGRbl.iQq.gOX/Q9Tx6Q4f2');

-- Enable foreign key support
PRAGMA foreign_keys = ON;