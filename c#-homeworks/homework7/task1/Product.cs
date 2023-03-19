using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;


namespace task1
{
    class Product
    {
        enum Categories
        {
            electronics,
            groceries,
            furniture,
            clothing
        }
        public int Id { get; set; }
        public string Name { get; set; }
        DateTime? expiration;
        string category;
        int price;
        public int Price { get => price; set { if (value >= 0) price = value; else throw new Exception("price can not be less than 0"); } }
        public string Category
        {
            get => category; set
            {
                if (Enum.IsDefined(typeof(Categories), value)) category = value;
                else throw new Exception($"category {value} does not exist");
            }
        }

        public DateTime? Expiration
        {
            get => expiration; set
            {
                if (DateTime.Compare(DateTime.Now, value??new DateTime(9999, 12, 31)) == -1) expiration = value;
                else if(value==null) expiration = null;
                else throw new Exception("expiration date can not be in the past");
            }
        }

        public Product(int id, string name, DateTime? expiration, string category, int price)
        {
            this.Id = id;
            this.Name = name;
            this.Expiration = expiration;
            this.price = price;
            this.category = category;
        }

            
    }
}
