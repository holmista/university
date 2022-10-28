#1
print(4 - 2**3 + 5**2 - 3 / 2)

#2
def decimal_to_binary(decimal):
  binary = ''
  while decimal > 0:
    binary += str(decimal % 2)
    decimal //= 2
  return binary[::-1]

decimal = int(input('Enter a decimal number: '))
print(decimal_to_binary(decimal))

#3
def calculate_salary(hours, salary_per_hour):
  return hours * salary_per_hour

hours = int(input('Enter working hours: '))
salary_per_hour = int(input('Enter salary per hour: '))
print(calculate_salary(hours, salary_per_hour))

#4
def average(*args):
  return sum(args)

print(average(1, 2, 3))

#5
def difference(number):
  return 100 - number
name = input('Enter your name: ')
age = int(input('Enter your age: '))
print(difference(age), name)

#6
def positive_number(number):
    if number > 0:
        print('Number is positive')
number = int(input('Enter a number: '))
positive_number(number)

#7
def divisible_by_ten(number):
    if number % 10 == 0:
        return True
    else:
        return False
number = int(input('Enter a number: '))
if divisible_by_ten(number):
    print('Number is divisible by 10')
else:
    print('Number is not divisible by 10')

#8
def calculate_average_or_product(number1, number2):
  if number1 > 10 and number2 > 10:
    return (number1 + number2) / 2
  else:
    return number1 * number2
number1 = int(input('Enter a number: '))
number2 = int(input('Enter a number: '))
print(calculate_average_or_product(number1, number2))

#9
def last_digit(number):
  return number % 10
number = int(input('Enter a number: '))
print(last_digit(number))


#10
def is_leap_year(year):
    if year % 4 == 0 and year % 100 != 0 or year % 400 == 0:
        return True
    else:
        return False
year = int(input('Enter a year: '))
if is_leap_year(year):
    print('Year is leap')


#11
def divisible_by_five(start=20, end=125):
  return [i for i in range(start, end + 1) if i % 5 == 0]

print(divisible_by_five())


#12
def divisible_by_eight(start=25, end=200):
  return [i for i in range(end, start + 1, -1) if i % 8 == 0]

print(divisible_by_eight())

#13
def common_divisor(number1, number2):
    if number1 > number2:
        number1, number2 = number2, number1
    for i in range(number1, 0, -1):
        if number1 % i == 0 and number2 % i == 0:
            return i
number1 = int(input('Enter a number: '))
number2 = int(input('Enter a number: '))
print(common_divisor(number1, number2))

#14
# input ten numbers with for loop and calculate average
def average():
    total = 0
    for i in range(10):
        number = int(input('Enter a number: '))
        total += number
    return total / 10

average()

#15
def even_sum(start=1, end=100):
  return [i for i in range(start, end + 1) if i % 2 == 0]


print(even_sum())

#16
def divisible_by_five_and_seven(start=1500, end=2100):
    return [i for i in range(start, end + 1) if i % 5 == 0 and i % 7 == 0]

divisible_by_five_and_seven()

#17
def sum_divisible_by_five_and_seven(start=1500, end=2100):
    total = 0
    for i in range(start, end + 1):
        if i % 5 == 0 and i % 7 == 0:
            total += i
    return total

sum_divisible_by_five_and_seven()

#18
def sum_divisible_by_five_and_seven_20000(start=1500, end=2100):
  total = 0
  for i in range(start, end + 1):
    if i % 5 == 0 and i % 7 == 0:
      total += i
      if total >= 20_000:
        return total
  return total


print(sum_divisible_by_five_and_seven())

#19
def count_divisible_by_five_and_seven_count(start=1500, end=2100):
  count = 0
  for i in range(start, end + 1):
    if i % 5 == 0 and i % 7 == 0:
      count += 1
  return count

#20
def divisible_by_five(start=15, end=150):
    return [i for i in range(start, end + 1) if i % 5 == 0 and i not in [50, 75, 80]]

print (divisible_by_five())

#21
def largest_common_divisor(number1, number2):
    if number1 > number2:
        number1, number2 = number2, number1
    for i in range(number1, 0, -1):
        if number1 % i == 0 and number2 % i == 0:
            return i

print(largest_common_divisor(10,5))

#22
def least_common_multiple(number1, number2):
    if number1 > number2:
        number1, number2 = number2, number1
    for i in range(number1, number1 * number2 + 1):
        if i % number1 == 0 and i % number2 == 0:
            return i
print(least_common_multiple(10,5))

#23
def largest_odd_number(numbers):
    largest = 0
    for number in numbers:
        if number % 2 != 0 and number > largest:
            largest = number
    if largest == 0:
        print('Not found')
    else:
        print(largest)

largest_odd_number([1,2,3,4,5,6,7,8,9])

#24
def divisors(numbers):
    divisors = []
    for number in numbers:
        for i in range(1, number + 1):
            if number % i == 0:
                divisors.append(i)
    return divisors

print(divisors([1,2,3,4,5,6,7,8,9]))

#25
def is_prime(number):
    if number == 1:
        return False
    for i in range(2, number):
        if number % i == 0:
            return False
    return True

#26
def prime_numbers():
    prime_numbers = []
    for i in range(2, 1000):
        if is_prime(i):
            prime_numbers.append(i)
    return prime_numbers

#27
def fibonacci_numbers():
    fibonacci_numbers = [0, 1]
    for i in range(2, 100):
        fibonacci_numbers.append(fibonacci_numbers[i - 1] + fibonacci_numbers[i - 2])
    return fibonacci_numbers

#28
def number_of_digits(number):
    return len(str(number))

#29
def sum_of_digits(number):
    total = 0
    for digit in str(number):
        total += int(digit)
    return total

#30
def reverse_number(number):
    return int(str(number)[::-1])

#31
def is_palindrome(number):
    return str(number) == str(number)[::-1]

#32
def factorial(number):
    total = 1
    for i in range(1, number + 1):
        total *= i
    return total

#33
def stairs():
    for i in range(1, 6):
        print('#' * i)
    for i in range(5, 0, -1):
        print('#' * i)








