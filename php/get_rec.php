<p>Вы уже знаете, что при отправке формы методом GET в адресной строке браузера после знака ? появляются данные формы. Эти данные в PHP коде будут доступны в массиве $_GET.
На самом деле наличие формы на страницы является не обязательным - мы можем просто руками написать в адресной строке знак вопроса, после него перечислить параметры с их значениями и нажать энтер.
В этом случае введенные нами данные также будут доступны в массиве $_GET. То есть получится имитация отправки формы. Такая имитация называется отправить GET запрос. Такие слова означают, что мы должны руками вбить в адресную строку вопросик и параметры запроса.
Параметры запроса перечисляются в следующем формате: имя, затем знак равно, затем значение параметра. Если параметров несколько, то они разделяются знаком амперсанд &.
Давайте попробуем на примерах. Пусть у вас есть некоторый PHP файл. Обратитесь к нему в браузере, как вы обычно это делаете. А затем добавьте в конец адресной строки ?par1=1 и нажмите энтер.
В результате наш параметр будет содержаться в $_GET['par1']:</p>