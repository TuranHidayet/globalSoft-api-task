# Bankomat Sistemi

Bu layihə, istifadəçilərin hesablarındakı balansları yoxlamaq, pullarını çıxarmaq və əməliyyatları izləmək kimi funksiyalar təqdim edən bir bankomat sistemini təsvir edir. Bu sistem, Laravel ilə qurulmuşdur və API vasitəsilə istifadəçilərin əməliyyatlarını idarə etməyə imkan verir.

## Layihənin Mövzusu

Bu layihə, istifadəçilərin müəyyən bir bank hesabında olan balanslarını yoxlamağa, balansdan müəyyən miqdarda pul çıxarmağa və bütün bu əməliyyatları izləməyə imkan verir. Həmçinin, **admin** hüquqları ilə əməliyyatları silmək və istifadəçiləri idarə etmək mümkün olacaq.

## Əsas Xüsusiyyətlər

- **Qeydiyyat**: İstifadəçilər öz hesablarını yaratmaq üçün qeydiyyatdan keçə bilərlər.
- **Balans yoxlama**: İstifadəçi hesabındakı balansını yoxlaya bilər.
- **Pul çıxarma**: İstifadəçilər hesablarından pullarını çıxara bilərlər. Çıxarılan pullar müxtəlif denominasiyalarda (100 AZN, 50 AZN, 20 AZN, 10 AZN, 5 AZN) verilir.
- **Əməliyyatlar**: İstifadəçilər əvvəlki əməliyyatları görə bilərlər.
- **Admin hüquqları**: Admin istifadəçiləri, digər istifadəçilərin əməliyyatlarını silə bilər.
  
## Quraşdırma

Bu layihəni öz sisteminizdə işə salmaq üçün aşağıdakı adımları izləyin:

1. **Layihəni klonlayın**:
    ```bash
    git clone https://github.com/TuranHidayet/globalSoft-api-task.git
    ```

2. **Composer ilə asılılıqları yükləyin**:
    ```bash
    cd repository-name
    composer install
    ```

3. **`.env` faylını yaratın**:
    Layihə kök dizinində `.env` faylını yaradın və verilənlər bazası məlumatlarınızı daxil edin.

4. **Miqrasiyaları işlədin**:
    ```bash
    php artisan migrate
    ```

5. **Serveri işə salın**:
    ```bash
    php artisan serve
    ```

## Əməliyyatlar

### 1. **Qeydiyyat**:

İstifadəçi `POST /register` endpoint ilə qeydiyyatdan keçə bilər. Burada `name`, `email`, və `password` göndərilməlidir.

#### Request:
```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123"
}
