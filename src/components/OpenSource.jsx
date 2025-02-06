import { motion } from "framer-motion";

import {contributions} from "../constants/index"

const Contribution = ({ logoUrl, organization, repo, title, link, number, linesAdded, linesDeleted }) => {
  return (
    <motion.div
      className="flex flex-col justify-between px-6 py-6 rounded-[20px] max-w-[370px] md:mr-10 sm:mr-5 mr-0 my-5 transition-colors duration-300 transform border hover:border-transparent dark:border-gray-700 dark:hover:border-transparent"
      whileInView={{ x: [-40, 0], opacity: [0, 1] }}
      transition={{ duration: 1 }}
    >
      <div className="flex flex-row">
        <img src={logoUrl} alt={organization} className="w-[30px] h-[30px] rounded-full mt-2" />
        <div className="flex flex-col ml-4">
          <a className="font-poppins font-normal text-[16px] text-white my-1 leading-[24px] hover:text-teal-200" href={link} target="_blank">
            {title}
          </a>
          <p className="font-poppins italic font-normal text-[14px] text-dimWhite my-1">
            {organization}/{repo}
          </p>
        </div>
      </div>
      <div className={`flex flex-row ${linesAdded ? "justify-around ml-2" : "ml-10"} mt-4`}>
        <a className="font-poppins font-normal text-[12px] text-dimWhite inline" href={link} target="_blank">
          {number}
        </a>
        {linesAdded && (
          <p className="font-poppins font-normal text-[14px]">
            <span className="text-green-600">+{linesAdded} </span>
            <span className="text-red-700">-{linesDeleted}</span>
          </p>
        )}
      </div>
    </motion.div>
  );
};

const OpenSource = () => {
  return (
    <section id="openSource">
      <h1 className="flex-1 font-poppins font-semibold ss:text-[55px] text-[45px] text-white ss:leading-[80px] leading-[80px]">
        Open Source Contributions
      </h1>
      <div className="container px-2 py-5 mx-auto mb-8">
        <div className="grid grid-cols-1 justify-center gap-8 mt-8 md:mt-16 md:grid-cols-3 sm:grid-cols-2">
          {contributions.map((contribution) => (
            <Contribution key={contribution.id} {...contribution} />
          ))}
        </div>
      </div>
    </section>
  );
};

export default OpenSource;
