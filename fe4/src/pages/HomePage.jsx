import React from "react";
import Layout from "./Layout";

const HomePage = () => {
  return (
    <Layout>
      <div className="flex w-full justify-center items-center min-h-screen">
        <div className="text-center">
          <div className="text-3xl font-semibold">
            <p>Haddad</p>
          </div>
          <div className="text-lg mt-2">
            <a
              href="/data_mhs"
              className="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded-lg"
            >
              Go to Data Mahasiswa Page
            </a>
          </div>
        </div>
      </div>
    </Layout>
  );
};

export default HomePage;
