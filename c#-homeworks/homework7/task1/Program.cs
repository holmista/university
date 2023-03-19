using task1;
using System.Linq;

Product sofa = new(1, "sofa for 1 person", null, "furniture", 300);
Product Iphone11 = new(2, "Iphone 11 pro max", null, "electronics", 1000);
Product Bread = new(3, "Sliced bread", new DateTime(2023, 5, 27), "groceries", 1);
Product Blue_Tshirt = new(4, "XL Standard blue T-shirt", null, "clothing", 30);
Product Ketchup = new(5, "Spicy ketchup", new DateTime(2023, 10, 25), "groceries", 3);

List<Product> Products = new List<Product>() { sofa, Iphone11, Bread, Blue_Tshirt, Ketchup};

IEnumerable<Product> ExpirationProducts = from prod in Products where prod.Expiration!=null
                                          orderby prod.Expiration select prod;
foreach(Product prod in ExpirationProducts)
{
    Console.WriteLine($"product name: {prod.Name}, expiration date: {prod.Expiration}");
}

int ExpirationProductsSum = ExpirationProducts.Where(prod => prod.Expiration != null).Select(prod => prod.Price).Sum();
Console.WriteLine($"total valuation of expiring products: {ExpirationProductsSum}");

var ProductGroups = from prod in Products
                    group prod by prod.Category into g
                    select new { Category = g.Key, Amount = g.Count(), Sum = g.Sum(prod => prod.Price) };
Console.WriteLine("Category    Amount    Sum");
foreach (var productGroup in ProductGroups)
{
    Console.WriteLine($"{productGroup.Category}    {productGroup.Amount}    {productGroup.Sum}");
}

Console.ReadKey();

