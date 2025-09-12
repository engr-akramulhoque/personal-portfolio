import { motion } from "framer-motion";
import { contributions } from "../constants/index";

const Contribution = ({ logoUrl, organization, repo, title, link, description, docs }) => {
  return (
    <motion.div
      className="flex flex-col justify-between px-6 py-6 rounded-2xl max-w-[370px] bg-gray-800 border border-gray-700 hover:border-teal-400 shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1"
      whileInView={{ x: [-40, 0], opacity: [0, 1] }}
      transition={{ duration: 0.8 }}
    >
      {/* Top Section */}
      <div className="flex flex-row items-center">
        <img
          src={logoUrl}
          alt={organization}
          className="w-10 h-10 rounded-full mt-1"
        />
        <div className="flex flex-col ml-4">
          <a
            className="font-poppins font-semibold text-[16px] text-white my-1 leading-[24px] hover:text-teal-400"
            href={link}
            target="_blank"
          >
            {title}
          </a>
          <p className="font-poppins italic font-normal text-[14px] text-gray-400">
            {organization}/{repo}
          </p>
        </div>
      </div>

      {/* Description */}
      <p className="font-poppins font-normal text-[14px] text-gray-300 mt-4">
        {description}
      </p>

      {/* Links */}
      <div className="flex flex-row mt-4 space-x-4">
        {link && (
          <a
            href={link}
            target="_blank"
            className="font-poppins text-[13px] text-teal-400 hover:underline"
          >
            📦 Packagist
          </a>
        )}
        {docs && (
          <a
            href={docs}
            target="_blank"
            className="font-poppins text-[13px] text-teal-400 hover:underline"
          >
            📖 Read Docs
          </a>
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
