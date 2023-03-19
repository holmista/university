a = seq(5,-11,-0.3)
print(a)
print(sort(a))
c = c(-1,3,-5,7,-9)
modifiedC = sort(rep(c,2,each=10), decreasing=FALSE)
print(modifiedC)
d = c(seq(6,12), rep(5.3,3), -3, seq(102,length(c),length.out=9))
print(d)
paste("length of d is", length(d))

##############

a = c(seq(3,6, length.out=5), rep(c(2,-5.1,-33),2), 7, 42+2)
print(a)

b = c(a[1], a[length(a)])
print(b)

c = a[c(-1, -length(a))]
print(c)

d = c(b[1], c, b[2])
print(d)

e = sort(a)
print(a)

f = e[length(e):1]
print(sort(e,decreasing=TRUE))
print(f)

g = c(rep(c[3], 3), rep(c[6], 4), c[length(c)])
print(g)

h = e
h[c(1, seq(5,7), length(h))] = seq(99,95,by=-1)
print(h)
print(e)