from numpy import *

#14
def sum_arrays(array1, array2):
    return add(array1,array2)

print(sum_arrays(array([1,2,3]),array([4,5,6])))

#15
def sum_matricies(matrix1, matrix2):
    return add(matrix1,matrix2)

print(sum_matricies(matrix([[1,2,3],[4,5,6]]),matrix([[7,8,9],[10,11,12]])))

#16
def multiply_arrays(array1, array2):
    return multiply(array1,array2)

print(multiply_arrays(array([1,2,3]),array([4,5,6])))

#17
def multiply_matricies(matrix1, matrix2):
    return multiply(matrix1,matrix2)

print(multiply_matricies(matrix([[1,2,3],[4,5,6]]),matrix([[7,8,9],[10,11,12]])))

#18
m1 = random.randint(10, size=(3, 3))

print(m1)

#19
m2 = random.randint(10, size=(10, 10))
