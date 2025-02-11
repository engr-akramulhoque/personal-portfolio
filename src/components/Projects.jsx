import React, { useState } from "react";
import { projects } from "../constants";
import { AiFillGithub } from "react-icons/ai";
import { BsLink45Deg } from "react-icons/bs";
import { motion } from "framer-motion";

const Project = ({ image, title, status, company, github, link, content, stack, onClick }) => {
  return (
    <motion.div
      className="px-12 py-8 transition-colors duration-300 transform border rounded-xl hover:border-transparent group dark:border-gray-700 dark:hover:border-transparent feature-card"
      initial={{ y: -30, opacity: 0 }}
      whileInView={{ y: 0, opacity: 1 }}
      viewport={{ once: false, amount: 0.5 }}
      transition={{ duration: 0.75, delay: 0.1 }}
    >
      <div className="flex flex-col sm:-mx-4 sm:flex-row">
        {/* Image with Click Event */}
        <img
          className="flex-shrink-0 object-cover w-24 h-24 rounded-full sm:mx-4 ring-4 ring-gray-300 cursor-pointer"
          src={image}
          alt=""
          onClick={() => onClick(image)}
        />

        <div className="mt-4 sm:mx-4 sm:mt-0">
          <h1 className="text-xl font-semibold font-poppins text-gray-700 capitalize md:text-2xl group-hover:text-white text-gradient">
            {title}
          </h1>
          <p className="font-poppins font-normal text-dimWhite mt-3">
            Company: {company || "Akramul Hoque"}
          </p>
          <p className="font-poppins font-sm text-gray-500 dark:text-gray-300 group-hover:text-gray-300">Status: {status}</p>
          <div className="mt-2 text-gray-500 capitalize dark:text-gray-300 group-hover:text-gray-300">
            <div className="flex sm:flex-row">
              {stack.map((tech) => (
                <div key={tech.id} className="text-dimWhite mr-5 text-[20px] hover:text-teal-200 tooltip">
                  {React.createElement(tech.icon)}
                  <span className="tooltiptext">{tech.name}</span>
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>

      <p className="mt-8 text-gray-500 dark:text-gray-300 group-hover:text-gray-300 font-poppins">
        {content}
      </p>

      <div className="flex mt-4 -mx-2">
        {github && (
          <a href={github} target="_blank" rel="noopener noreferrer">
            <AiFillGithub size="2rem" className="text-white mr-1 hover:text-teal-200" />
          </a>
        )}
        {link && (
          <a href={link} target="_blank" rel="noopener noreferrer">
            <BsLink45Deg size="2rem" className="text-white hover:text-teal-200" />
          </a>
        )}
      </div>
    </motion.div>
  );
};

const Projects = () => {
  const [selectedImage, setSelectedImage] = useState(null);

  return (
    <section id="projects">
      <h1 className="flex-1 font-poppins font-semibold ss:text-[55px] text-[45px] text-white ss:leading-[80px] leading-[80px]">
        Projects
      </h1>

      <div className="container px-2 py-10 mx-auto mb-8">
        <div className="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
          {projects.map((project) => (
            <Project key={project.id} {...project} onClick={setSelectedImage} />
          ))}
        </div>
      </div>

      {/* Image Modal */}
      {selectedImage && (
        <div
          className="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50"
          onClick={() => setSelectedImage(null)}
        >
          <div className="relative">
            <img src={selectedImage} alt="Project Preview" className="max-w-full max-h-[90vh] rounded-lg shadow-lg" />
            <button
              className="absolute top-2 right-2 bg-red-600 text-white p-2 rounded-full hover:bg-red-800"
              onClick={() => setSelectedImage(null)}
            >
              ✖
            </button>
          </div>
        </div>
      )}
    </section>
  );
};

export default Projects;
