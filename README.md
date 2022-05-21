# Кальулятор ипотеки БебраБанка
![GitHub release (latest by date including pre-releases)](https://img.shields.io/github/v/release/AzureLinker/BebraBank-Ipoteka?include_prereleases)
***
### Авторы:
1. [Кирилл Аверьянов - ZianU](https://github.com/AzureLinker) <a id="ZianU"></a>
2. [Андрей Пономарёв](https://github.com/ponomarevandrej881)
3. [Полина Буренкова](https://github.com/polina222232)
***
### Что может этот калькулятор:
1. Этот калькулятор может спокойно принимать разные значения, а также действительно высчитывает всё по формулам.
2. Есть возможность выбрать налоговые программы ипотеки.
3. Есть возможность выбрать скидки.
4. У Калькулятора есть тултипы[^1] в местах, в которых может не сразу быть понятно, почему всё делается именно так, а не иначе.

| Программа | Налог |
| :--- | ---: |
| Базовая программа | 12% |
| Господдержка | 6% |
| Вечные | 14% |
| Для семей с детьми | 9% |
|  Для пенсионеров | 60% |
| Спецоперационная ипотека |  146% |

| Опция | Скидка |
| :--- | ---: |
| Зарплатная карта БебраБанка | 5% |
| Подтверждение дохода |  +8% |

***
### Список изменений:
<<<<<<< HEAD
__21 мая 2022 года:__
- Тесты теперь работают все.
- Можно проверить всю директироию с тестами.
=======
__30 апреля 2022 года:__
- Исправлена ошибка, из-за которой подсчёт результатов не работал.
>>>>>>> a30b6791b30838a28fe529e23eb74e6ed0a339af

__9 апреля 2022 года:__
- Загрузка результата в json файле вынесена в отдельный класс.
- Созданы дополнительные тесты.

__8 апреля 2022 года:__
- Добавлены phpunit тесты.
- Расчёт ипотеки теперь полностью вымещен в классы, чтобы ускорить загрузку страницы.
- Проект готов к релизу, осталось дождаться фидбека.

__7 апреля 2022 года:__
- Добавлен расчёт ежемесячного платежа по месяцам.
- Добавлено сохранение результата просчёта в виде JSON файла.
- Исправлен расчёт, теперь программы ипотеки действуют не как скидки, а как налоги.
- Теперь спецоперационная ипотека работает.
- У всех программ ипотеки теперь убраны плюсы и минусы, чтобы они не воспринимались как скидки.
- Добавлена история БебраБанка.
- Добавлена история Carnival Night Zone.
- Добавлена ветка с нецензурной версией сайта.

__6 апреля 2022 года:__
- Добавлена обработка запроса.
- Исправлена ошибка, где скидка считалась некорректно.
- Теперь скидка от зарплатной карты и подтверждения доходов считается.
- Исправлена ошибка, где общая сумма считалась некорректно.
- Исправлена ошибка, где все подсчёты уходили в минус.
- Добавлена страница, которая указывает на ошибку, связанную с тем, что первоначальный взнос больше, чем сумма запрашиваемого кредита.

__3 апреля 2022 года:__
- Создан репозиторий для калькулятора ипотеки.
- Создан красивый файл ReadMe.
- Загружена пока что не рабочая, но красивая версия сайта.
- Параллельно идут раздумия о том, как бы организовать специальный файл, в котором я[^2] буду указывать спиок изменений, структура должна быть хоть как-то организована.

[^1]: Подсказки, вспплывающие при наведении.
[^2]: [ZianU](#ZianU)

