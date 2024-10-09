
## Merion Academy Knowledge Base
# Ветки

## Памятка

<table>
  <thead>
    <tr>
      <th>Название</th>
      <th>Ветка</th>
      <th>Описание и инструкции</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Стейбл</td>
      <td>stable</td>
      <td>Сливать из Рабочей (master) или из Фиксов (hotfix-*) если проблемы требуют быстрого решения, связана с продакшн</td>
    </tr>
    <tr>
      <td>Стейджинг</td>
      <td>staging</td>
      <td>Сливать из Рабочей (master) или из Фиксов (hotfix-*), связана с staging сервером</td>
    </tr>
    <tr>
      <td>Рабочая</td>
      <td>master</td>
      <td>Сливать из фичей и из хотфиксов</td>
    </tr>
    <tr>
      <td>Фичи</td>
      <td>feature-*</td>
      <td>Всегда создается от master</td>
    </tr>
    <tr>
      <td>Хотфиксы</td>
      <td>hotfix-*</td>
      <td>Всегда создается от stable</td>
    </tr>
  </tbody>
</table>

## Основные ветки

Основной репозиторий всегда будет содержать две постоянно актуальные (вечнозеленые) ветки:

* `master`
* `stable`

Основная ветка  origin/master ветка где исходный код всегда отражает состояние с последними внесенными изменениями разработки. Ветки с фичами, фикасами сливаются с master.

Ветка origin/stable всегда представляет последний код, развернутый в продакшне. Во время повседневной разработки с веткой stable не будут проводиться никакие действия.
Когда исходный код в ветке master становится стабильным, все изменения сливаются в stable и **помечаются номером релиза**.


# Среда и переменные окружения
* PHP 8.2 - 8.3
* MariaDB 11.2-11.3
* Redis + predis:^2.0

# Стек
* Laravel 11
* MariaDB
* Redis
* Composer
* NPM
* Сборщик VITE
* SCSS (пока оставляем CSS если нет источников)

# План миграции
_По желанию можно сюда включить настройку локального окружения, Docker, но это по вкусу._

## 1. База данных
1. [ ] Проектирование БД
2. [ ] Написание миграций
3. [ ] Написание моделей
4. [ ] Перенос статей в новую БД
5. [ ] Сидеры для глоссария (теги, типы статей)

## 2. Роутинг
1. [ ] Настройка роутинга в соответсвии с тем как сейчас он устроен на проде

## 2. Бизнес-логика
1. [ ] Перенос существующей бизнес логики в Контроллеры, репозитории, сервисы
2. [ ] Встраивание метатегов для SEO как на проде через Laravel Meta Tags
3. [ ] Нарезка шаблонов для ключевых страниц, на шаблоны BLADE
4. [ ] Сборка фронтенда при наличии сорцов


## 4. Покрытие тестами
1. [ ] Покрытие тестами

## 5. Аренда и провижн серверов
1. [ ] Production server
2. [ ] Staging server
3. [ ] Провижн через с Ansible

## 5. Деплоймент
1. [ ] Конфигурация CI/CD процессов
2. [ ] Обеспечение безопасного процесса деплоя новых версий
