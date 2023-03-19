import React from "react";

export interface IProductCardProps {
  images: string[];
  category: string;
  price: number;
  title: string;
  handleDelete: () => void;
}

const ProductCard: React.FC<IProductCardProps> = ({
  images,
  category,
  price,
  title,
  handleDelete,
}) => {
  return (
    <div className="p-5 flex flex-col gap-6">
      <img
        src={images[images.length - 1]}
        className="object-cover h-[350px] w-full"
      />
      <div>{category}</div>
      <div>{price}</div>
      <div>{title}</div>
      <button
        className="bg-slate-200 hover:bg-slate-500 p-3 rounded"
        onClick={handleDelete}
      >
        delete
      </button>
    </div>
  );
};

export default ProductCard;
