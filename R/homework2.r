a = matrix(c(4.3, 3.1, 8.2, 8.2, 3.2, 0.9, 1.6, 6.5), nrow=4, ncol=2)
print(a)

b = a[-1,]
print(dim(a))

c = a
c[,2] = sort(c[,2])
print(c)

d = matrix(c[-4, -1])
print(d)

e = c[3:4,]
print(e)


rows = c(4, 1, 4, 2)
cols = c(2, 2, 1, 1)
c[cbind(rows, cols)] = -1/2*diag(e)
print(c)

m1 = matrix(c(1, 2, 2, 4, 7, 6), nrow=3, ncol=2, byrow=TRUE)
m2 = matrix(c(10, 20, 30, 40, 50, 60), nrow=3, ncol=2, byrow=TRUE)
print((m1-m2)*2/7)

A = matrix(c(1,2,7))
B = matrix(c(3, 4, 8))
print(A*B)
print(t(A)%*%B)
print(t(B)%*%(A%*%t(A)))
print((B%*%t(B)) + (A%*%t(A)) - 100*diag(3))

A = rbind(c(2, rep(0, 3)), c(0, 3, 0, 0), c(0, 0, 5, 0), c(rep(0, 3), -1))
print(t(A)%*%A - diag(4))



