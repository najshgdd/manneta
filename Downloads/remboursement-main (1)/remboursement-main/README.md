# مشروع إدارة طلبات التعويض

نظام ويب بسيط لإدارة طلبات التعويض بثلاث صفحات للمستخدم ولوحة تحكم إدارية، مع إشعار تلقائي عبر Telegram.

## الملفات الرئيسية

- `public/index.html`: نموذج المستخدم.
- `public/traitement.html`: صفحة انتظار للتحقق من حالة الطلب.
- `public/validation_remboursement.html`: صفحة الموافقة.
- `backend/server.js`: الباكند (Express API).
- `dashboard/admin.html`: لوحة التحكم الإدارية.
- `README.md`: هذا الملف.

## تشغيل المشروع

1. **تثبيت المتطلبات**
   ```
   npm install express cors body-parser
   ```

2. **تشغيل السيرفر**
   ```
   node backend/server.js
   ```

3. **الدخول**
   - نموذج المستخدم: `/index.html`
   - لوحة التحكم: `/dashboard/admin.html` (كلمة مرور: `admin123`)

## تفعيل إشعارات Telegram

1. أنشئ بوت عبر [BotFather](https://t.me/BotFather) واحصل على الـToken.
2. احصل على `chat_id` (يمكن استخدام https://api.telegram.org/bot<token>/getUpdates بعد إرسال رسالة للبوت).
3. ضع الـToken وChat ID في ملف `backend/server.js`.

## ملاحظات

- تخزين الطلبات يتم في الذاكرة فقط (تحتاج قاعدة بيانات للإنتاج).
- حماية لوحة التحكم بكلمة مرور ثابتة (يمكن تحسينها لاحقاً).
- يمكنك تخصيص التصميم أو إضافة خصائص حسب الحاجة.
