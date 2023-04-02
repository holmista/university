Titanic = read.csv("Titanic.csv")
# 1
# Survived - categorical nominal; Pclass - categorical ordinal; Name - identifier; Sex - categorical nominal; Age - numeric; 
# Siblings.Spouses_aboard - categorical nominal; Parents.Children_Aboard - categorical nominal; Fare - numeric

#2
Titanic$Survived.char = ifelse(
  (Titanic$Survived == 0),
  "Did not survive",
  "Survived"
)
#3
table(Titanic$Survived.char)
prop.table(table(Titanic$Survived.char))*100
# 4
table(Titanic$Pclass)
prop.table(table(Titanic$Pclass))*100
# 5
barplot(
  table(Titanic$Survived.char),
  main = "survival chart",
  xlab = "outcome",
  ylab = "amount"
)
# 6
pie(
  prop.table(table(Titanic$Pclass))*100,
  main = "percentage of passengers under different ticket classes",
  col = c("red", "green", "blue")
)
# 7
table(Titanic$Survived.char, Titanic$Pclass)
# 8
barplot(
  table(Titanic$Survived.char, Titanic$Pclass),
  beside = TRUE,
  legend.text = TRUE,
  xlab = "class",
  ylab = "amount"
)
# 9
# passengers who had class 1 ticket had more chance of survival than class 2 ticlet passengers
# and class 2 ticlet passengers had more chance of survival than class 3 ticket passengers.

