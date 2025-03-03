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

###  **Login**:

İstifadəçi `POST /login` endpoint ilə giriş keçə bilər. Burada `email` və `password` göndərilməlidir.

![Balance Check Image](https://github.com/TuranHidayet/globalSoft-api-task/blob/master/login.jpeg?raw=true)

###  **Balans**:

İstifadəçi `POST /withdraw` endpoint vasitəsilə pullarını çıxara bilər. Əgər Balansda kifayət qədər vəsait yoxdursa:

![Balance Check Image](https://github.com/TuranHidayet/globalSoft-api-task/blob/master/images/balanskifayetetmir.png?raw=true)

## **Deposit (Balans Artırmaq )**
İstifadəçilər `POST /deposit` endpoint vasitəsilə hesablarına pul əlavə edə bilərlər. Bu əməliyyat üçün **Bearer Token** and an **amount** tələb olunur.
 
![Deposit](https://github.com/TuranHidayet/globalSoft-api-task/blob/master/images/deposit.jpeg?raw=true)

### **Request Example:**
```json
{
    "amount": 200
}
```

## **Withdraw (Pul Çıxarma)**
İstifadəçilər `POST /withdraw` endpoint vasitəsilə hesablarından pul çıxara bilərlər. Bu əməliyyat üçün **Bearer Token** və **amount** parametri tələb olunur.

![Withdraw](https://github.com/TuranHidayet/globalSoft-api-task/blob/master/images/pulcekmekwithdraw.jpeg?raw=true)

### **Request Example:**
```json
{
    "amount": 100
}
```

---

## **View Transactions (Əməliyyatlara Baxmaq)**
İstifadəçilər `GET /transactions` endpoint vasitəsilə keçmiş əməliyyatlarını görə bilərlər. Bu əməliyyat üçün **Bearer Token** tələb olunur.
 
![Transactions](https://github.com/TuranHidayet/globalSoft-api-task/blob/master/images/transactions.jpeg?raw=true)

### **Request Example:**
```http
GET /transactions
Authorization: Bearer {generated_api_token}
```

---

## **Əməliyyatı Silmək (Admin Only)**
Admin istifadəçilər `DELETE /transaction/{id}` endpoint vasitəsilə əməliyyatları silə bilərlər. Bu əməliyyat üçün **Admin Bearer Token** tələb olunur..
 
![Delete Transaction](https://github.com/TuranHidayet/globalSoft-api-task/blob/master/images/delete.jpeg?raw=true)

### **Request Example:**
```http
DELETE /transaction/{id}
Authorization: Bearer {admin_api_token}
```

---





