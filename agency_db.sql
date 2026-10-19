CREATE DATABASE IF NOT EXISTS agency_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE agency_db;

CREATE TABLE IF NOT EXISTS plans (
  id INT AUTO_INCREMENT PRIMARY KEY,
  plan_id VARCHAR(50) UNIQUE,
  name VARCHAR(100) NOT NULL,
  price INT NOT NULL,
  billing VARCHAR(50) DEFAULT '/ one-time',
  badge VARCHAR(50) DEFAULT '',
  is_featured TINYINT(1) DEFAULT 0,
  description TEXT,
  features TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS coupons (
  id INT AUTO_INCREMENT PRIMARY KEY,
  code VARCHAR(50) UNIQUE NOT NULL,
  type VARCHAR(20) NOT NULL DEFAULT 'percent',
  value INT NOT NULL,
  label VARCHAR(150),
  active TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_id VARCHAR(50) UNIQUE NOT NULL,
  tracking_password VARCHAR(50) NOT NULL,
  client_name VARCHAR(100) NOT NULL,
  phone VARCHAR(50) NOT NULL,
  business VARCHAR(150) NOT NULL,
  email VARCHAR(150) NOT NULL,
  plan_name VARCHAR(100) NOT NULL,
  amount_paid DECIMAL(10,2) NOT NULL,
  order_date VARCHAR(50) NOT NULL,
  stage INT DEFAULT 1,
  status_note TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO plans (plan_id, name, price, billing, badge, is_featured, description, features) VALUES
('basic', 'Basic Starter', 4999, '/ one-time', 'Starter', 0, 'For small local services needing a fast, professional online presence.', '["Clean Responsive Website", "Custom Logo and Brand Palette", "1 Promotional AI Short Video", "Direct WhatsApp Instant Button", "5-7 Days Fast Delivery"]'),
('growth', 'Growth Business', 9999, '/ one-time', 'Growth', 0, 'For growing businesses looking to capture leads and showcase their work.', '["Up to 5 Pages Multi-Section Website", "Complete Logo Suite and Social Icons", "2 AI Storytelling Promo Video Reels", "Digital Letterhead Generator Tool", "PhonePe Direct UPI Checkout"]'),
('pro', 'Pro Business Suite', 16999, '/ one-time', 'RECOMMENDED FOR VENDORS', 1, 'Full automation suite: Solar vendors, event organizers and service leaders.', '["Full Custom Business Website", "Logo Design and Complete Brand Kit", "Live Quotation Generator Tool", "Work Completion Certificate Maker", "Digital Letterhead System", "4 Cinematic AI Video Ads (Voice + 4K)", "PhonePe + UPI Gateway Integration"]'),
('enterprise', 'Enterprise AI Automation', 29999, '/ one-time', 'Enterprise', 0, 'Comprehensive web system with custom client portal and unlimited video pipeline.', '["Unlimited Pages and Custom Client Portal", "Full Brand Identity and Vector Logo Suite", "Quotation, Invoice and Certificate Engine", "8 Cinematic AI Video Advertisements", "WhatsApp Business API Auto-Responder"]')
ON DUPLICATE KEY UPDATE name=VALUES(name), price=VALUES(price), description=VALUES(description), features=VALUES(features);

INSERT INTO coupons (code, type, value, label, active) VALUES
('VIP50', 'percent', 50, 'VIP Special 50% OFF', 1),
('DISCOUNT10', 'percent', 10, '10% Launch Discount', 1),
('EARLYBIRD', 'flat', 2000, '2000 Flat Savings', 1),
('SOLAR25', 'percent', 25, '25% Solar and Vendor Discount', 1)
ON DUPLICATE KEY UPDATE value=VALUES(value), label=VALUES(label), active=VALUES(active);

INSERT INTO orders (order_id, tracking_password, client_name, phone, business, email, plan_name, amount_paid, order_date, stage, status_note) VALUES
('ORD-89421', 'PASS-4921', 'Ramesh Patel', '+91 98765 43210', 'Patel Solar Solutions', 'ramesh@patelsolar.com', 'Pro Business Suite', 8499.50, '19 Oct 2026', 3, 'Solar quotation calculator and digital letterhead integrated. Generating 4K AI video ads.')
ON DUPLICATE KEY UPDATE stage=VALUES(stage), status_note=VALUES(status_note);
