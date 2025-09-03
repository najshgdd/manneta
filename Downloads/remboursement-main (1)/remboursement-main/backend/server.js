const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const crypto = require('crypto');
const path = require('path');
const fetch = (...args) => import('node-fetch').then(({default: fetch}) => fetch(...args));

const app = express();
app.use(bodyParser.json());
app.use(cors());

let requests = [];

// إعدادات Telegram (ضع التوكن والـ chat_id الحقيقيين)
const TELEGRAM_BOT_TOKEN = '7368290990:AAG7claT-AMJ4EuTyPfNIH5B8EgL-oXDB8s';
const TELEGRAM_CHAT_ID = '5372119436';

// دالة إرسال إشعار Telegram
function notifyTelegram(request) {
  const message =
    `طلب جديد\n` +
    `الاسم: ${request.name}\n` +
    `البريد: ${request.email}\n` +
    `التفاصيل: ${request.details}\n` +
    `التوكن: ${request.token}\n` +
    `الحالة: ${request.status}`;
  fetch(`https://api.telegram.org/bot${TELEGRAM_BOT_TOKEN}/sendMessage?chat_id=${TELEGRAM_CHAT_ID}&text=${encodeURIComponent(message)}`)
    .catch(e => console.error("Telegram error", e));
}

app.post('/api/submit', (req, res) => {
  const { name, email, details } = req.body;
  const token = crypto.randomBytes(8).toString('hex');
  const timestamp = Date.now();
  const request = { name, email, details, status: 'pending', token, timestamp };
  requests.push(request);
  notifyTelegram(request);
  res.json({ token });
});

app.get('/api/status/:token', (req, res) => {
  const request = requests.find(r => r.token === req.params.token);
  if (!request) return res.status(404).json({ status: 'not_found' });
  res.json({ status: request.status });
});

const ADMIN_PASSWORD = 'admin123';
app.post('/api/admin/login', (req, res) => {
  const { password } = req.body;
  if (password === ADMIN_PASSWORD) return res.json({ success: true });
  res.status(401).json({ success: false });
});

app.get('/api/admin/requests', (req, res) => {
  res.json({ requests });
});

app.post('/api/admin/approve/:token', (req, res) => {
  const request = requests.find(r => r.token === req.params.token);
  if (!request) return res.status(404).json({ success: false });
  request.status = 'approved';
  res.json({ success: true });
});

app.use(express.static(path.join(__dirname, '../public')));
app.use('/dashboard', express.static(path.join(__dirname, '../dashboard')));

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Server running on port ${PORT}`);
});
