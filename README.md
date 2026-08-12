# Al Rayees Group — موقع الشركة | Corporate Website

موقع تعريفي من صفحة واحدة لمجموعة الريس، ثنائي اللغة (عربي/إنجليزي)، مبني على **Laravel 10** + **Vite**.
الموقع **واجهة أمامية فقط** — لا قاعدة بيانات ولا API.

A bilingual single-page corporate site for Al Rayees Group, built on **Laravel 10** + **Vite**.
Front-end only — no database, no API.

---

## التشغيل | Getting started

```bash
composer install
npm install

cp .env.example .env      # إن لم يكن موجوداً
php artisan key:generate

npm run dev               # وضع التطوير (HMR)
php artisan serve
```

للإنتاج | For production:

```bash
npm run build
php artisan config:cache && php artisan route:cache && php artisan view:cache
```

> لا حاجة لأي إعداد قاعدة بيانات — الموقع لا يتصل بأي backend.

---

## المسارات | Routes

| URL   | اللغة     | الاتجاه | Route name |
| ----- | --------- | ------- | ---------- |
| `/`   | العربية   | RTL     | `home.ar`  |
| `/en` | English   | LTR     | `home.en`  |

اللغة تُحدَّد عبر `->defaults('locale', …)` في [routes/web.php](routes/web.php)، ويلتقطها
[SetLocale](app/Http/Middleware/SetLocale.php) الذي يشارك `$locale` و`$dir` و`$isRtl` مع كل الواجهات.

---

## أين أعدّل المحتوى؟ | Where to edit content

**كل النصوص** في ملفي الترجمة — ملفات Blade خالية تماماً من أي نص مكتوب:

- [lang/ar/site.php](lang/ar/site.php) — النصوص العربية
- [lang/en/site.php](lang/en/site.php) — النصوص الإنجليزية

الملفان يستخدمان **نفس المفاتيح حرفياً**؛ أي مفتاح تضيفه لأحدهما أضفه للآخر.

هيكل الصفحة (الأقسام، ترتيب القائمة، لون كل نشاط) في [config/site.php](config/site.php).

---

## بنية المشروع | Structure

```
app/Http/
  Controllers/HomeController.php      عرض الصفحة الوحيدة
  Middleware/SetLocale.php            ضبط اللغة والاتجاه ومشاركتهما مع الواجهات

config/site.php                       اللغات + خريطة الأقسام + لون كل نشاط
lang/{ar,en}/site.php                 كل نصوص الموقع

resources/views/
  layouts/app.blade.php               القالب الأساسي (<head>، الأصول، الوسوم)
  pages/home.blade.php                الصفحة: تجمع الأقسام بالترتيب
  partials/                           الهيدر، الفوتر، الخلفية، شاشة التحميل
  sections/                           hero · about · overview · contact
  sections/divisions/                 charcoal · danaroz · amtech · leadwell
  components/                         مكوّنات Blade مجهولة قابلة لإعادة الاستخدام

resources/css/
  app.css                             نقطة الدخول (تستورد الطبقات بالترتيب)
  base/                               tokens · reset · typography · utilities
  layout/                             layout · header · footer
  components/                         buttons · cards · stats · marquee · tabs · lists · contact
  sections/                           hero · divisions
  effects/                            ambient (الخلفية) · motion (الحركات)

resources/js/
  app.js                              نقطة الدخول
  modules/                            preloader · header · reveal · accent · counters
                                      pointer · tabs · embers · to-top
```

---

## نظام التصميم | Design system

- **الرموز (Tokens)** في [resources/css/base/\_tokens.css](resources/css/base/_tokens.css) — الألوان
  والمسافات والخطوط والحركة. لا قيمة لونية مكتوبة مباشرة خارج هذا الملف.
- **اللون المتغيّر:** المتغيّر `--accent` يُعاد رسمه أثناء التمرير — كل نشاط له لونه
  (الفحم برتقالي، دانا روز وردي، أمتك سماوي، ليدويل أزرق)، وباقي الصفحة ذهب المجموعة.
  المنطق في [modules/accent.js](resources/js/modules/accent.js) والنطاقات في `_tokens.css`.
- **دعم RTL:** الأنماط تستخدم الخصائص المنطقية (`inset-inline`, `margin-inline`, `padding-block`)،
  ولا تُستخدم الخصائص الفيزيائية إلا حيث تكون العملية متماثلة فعلاً (توسيط، وشريط التقدّم)
  — وهي مُعلَّمة بتعليق في مكانها.
- **الخطوط:** Sora للاتينية، IBM Plex Sans Arabic للعربية (من Google Fonts).
- **الأرقام:** لاتينية في اللغتين — الخط العربي المعتمد لا يحمل الأرقام الهندية،
  وتركها للنظام يبدّل الخط في منتصف الرقم.

## الحركة | Motion

كل الحركات تحسينات تدريجية فوق HTML مُولَّد من الخادم — الصفحة تُقرأ كاملة بدون JavaScript.
وكلها تتوقف عند تفعيل `prefers-reduced-motion`.

| الوحدة        | الوظيفة                                                    |
| ------------- | ---------------------------------------------------------- |
| `preloader`   | شاشة بداية قصيرة (بحدّ أقصى 2.4 ثانية لا تحجب الصفحة أبداً) |
| `header`      | حالة الهيدر عند التمرير + شريط التقدّم + تتبّع القسم النشط + قائمة الجوال |
| `reveal`      | ظهور العناصر عند التمرير مع تدرّج زمني                      |
| `accent`      | تبديل لون الصفحة حسب النشاط المعروض                         |
| `counters`    | عدّ الأرقام تصاعدياً عند ظهورها                              |
| `pointer`     | إضاءة تتبع المؤشر + ميلان ثلاثي الأبعاد + أزرار مغناطيسية    |
| `tabs`        | تبويبات أسواق الفحم (بدعم لوحة المفاتيح)                     |
| `embers`      | جمرات متحركة على canvas في الواجهة (تتوقف خارج الشاشة)       |
| `to-top`      | زر العودة للأعلى بحلقة تقدّم                                 |

---

## ملاحظات | Notes

- الصور: لم يزوّدنا العميل بصور، فالتصميم يعتمد على التدرّجات والأيقونات المتجهة (SVG مضمّنة
  في [components/icon.blade.php](resources/views/components/icon.blade.php)) — يمكن استبدال أي بطاقة
  بصورة لاحقاً دون تغيير البنية.
- كل بيانات التواصل مأخوذة حرفياً من مستند العميل، وروابط الهاتف/البريد/واتساب فعّالة.
"# Al-Rayees-Website" 
