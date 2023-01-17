import React, { useState, useEffect } from "react";
import useDebounce from "./hooks/useDebounce";
import useFetch from "./hooks/useFetch";
import LoadingPlaceholder from "./components/LoadingPlaceholder";
import ProductCard from "./components/ProductCard";
import { IProductCardProps } from "./components/ProductCard";
import { useAutoAnimate } from "@formkit/auto-animate/react";

interface IProduct extends IProductCardProps {
  id: number;
}

function App() {
  const [search, setSearch] = useState("");
  const [products, setProducts] = useState<IProduct[]>([]);
  const [parent] = useAutoAnimate({ duration: 200 });
  const debouncedSearch = useDebounce(search, 500);
  const { data, loading, error } = useFetch(
    "https://dummyjson.com/products/search?q="
  );
  useEffect(() => {
    setProducts(data?.products as IProduct[]);
  }, [data]);

  return (
    <div>
      <div className="mt-5 flex flex-col justify-center gap-2">
        <h1 className="text-2xl text-center">search your products</h1>
        <input
          type="text"
          value={search}
          onChange={(e) => setSearch(e.target.value)}
          className="border-2 border-gray-300 px-2 rounded mx-auto max-w-lg"
        />
      </div>
      {loading && <LoadingPlaceholder />}
      {error && <div>error</div>}
      <div className="grid grid-cols-1 sm:grid-cols-3" ref={parent}>
        {products &&
          products
            .filter(({ title }) =>
              title.toLocaleLowerCase().includes(debouncedSearch)
            )
            .map(({ id, category, images, price, title }) => (
              <ProductCard
                key={id}
                category={category}
                images={images}
                price={price}
                title={title}
                handleDelete={() =>
                  setProducts(
                    products.filter((product: IProduct) => product.id !== id)
                  )
                }
              />
            ))}
      </div>
    </div>
  );
}

export default App;
