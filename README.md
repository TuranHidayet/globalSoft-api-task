# Layihənin Mövzusu

Bu layihə, istifadəçilərin müəyyən bir bank hesabında olan balanslarını yoxlamağa, balansdan müəyyən miqdarda pul çıxarmağa və bütün bu əməliyyatları izləməyə imkan verir. Həmçinin, **admin** hüquqları ilə əməliyyatları silmək və istifadəçiləri idarə etmək mümkün olacaq.

## Əsas Xüsusiyyətlər

- **Qeydiyyat**: İstifadəçilər öz hesablarını yaratmaq üçün qeydiyyatdan keçə bilərlər.
- **Balans yoxlama**: İstifadəçi hesabındakı balansını yoxlaya bilər.
- **Pul çıxarma**: İstifadəçilər hesablarından pullarını çıxara bilərlər. Çıxarılan pullar müxtəlif denominasiyalarda (100 AZN, 50 AZN, 20 AZN, 10 AZN, 5 AZN, 1 AZN) verilir.
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

### 1. **Login**:

İstifadəçi `POST /login` endpoint ilə giriş keçə bilər. Burada `email` və `password` göndərilməlidir.

![Balance Check Image](https://raw.githubusercontent.com/TuranHidayet/globalSoft-api-task/166fb14c45dbac4ab50eca4d9b4fbd27410a1b0d/login.jpeg)


### 1. **Balans yoxlama**:

İstifadəçi `GET /balance` endpoint ilə hesab balansını yoxlaya bilər. Bu əməliyyat üçün **Bearer Token** istifadə olunur.



![Balance Check Image](https://raw.githubusercontent.com/TuranHidayet/globalSoft-api-task/166fb14c45dbac4ab50eca4d9b4fbd27410a1b0d/getBalance0.jpeg)





