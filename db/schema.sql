-- Database schema for Codify platform

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    type VARCHAR(20) NOT NULL DEFAULT 'client',
    phone VARCHAR(20),
    address VARCHAR(255),
    profile_img VARCHAR(255),
    verify_token VARCHAR(128),
    token_created DATETIME,
    is_verified TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS client (
    cid INT PRIMARY KEY,
    sec VARCHAR(100),
    serv VARCHAR(100),
    address VARCHAR(255),
    phone VARCHAR(20),
    FOREIGN KEY (cid) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS freelancer (
    fid INT PRIMARY KEY,
    name VARCHAR(100),
    lang VARCHAR(100),
    attestation VARCHAR(255),
    FOREIGN KEY (fid) REFERENCES users(id) ON DELETE CASCADE
);


CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    budget DECIMAL(10,2) DEFAULT 0,
    deadline DATE,
    fid INT DEFAULT NULL,
    status VARCHAR(20) DEFAULT 'open',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    file VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS post_req (
    rid INT AUTO_INCREMENT PRIMARY KEY,
    pid INT NOT NULL,
    fid INT NOT NULL,
    price DECIMAL(10,2) DEFAULT 0,
    duration INT,
    msg TEXT,
    status VARCHAR(20) DEFAULT 'Pending',
    FOREIGN KEY (pid) REFERENCES projects(id) ON DELETE CASCADE,
   
    FOREIGN KEY (fid) REFERENCES freelancer(fid) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS mssgusers (
    unique_id INT AUTO_INCREMENT PRIMARY KEY,
    cid INT,
    fid INT,
    name VARCHAR(100) NOT NULL,
    img VARCHAR(255),
    status VARCHAR(30) DEFAULT 'Online',
    FOREIGN KEY (cid) REFERENCES client(cid) ON DELETE CASCADE,
    FOREIGN KEY (fid) REFERENCES freelancer(fid) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_id INT,
    sender_id INT NOT NULL,
    receiver_id INT NOT NULL,
    content TEXT NOT NULL,
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE,
    FOREIGN KEY (sender_id) REFERENCES mssgusers(unique_id) ON DELETE CASCADE,
    FOREIGN KEY (receiver_id) REFERENCES mssgusers(unique_id) ON DELETE CASCADE
);

